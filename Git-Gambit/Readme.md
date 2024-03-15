# Git-Gabmit

userflag - `pentathon{eed89d4ed9122079da4ec1195158338a96023f6e3c6c5c9a1ae5a8d40d31d35e}`   
rootflag - `pentathon{c5504ece6809b48459803fbb7874643a9f964c44f7fcc2db2a7d41132b63f24e}`


## Description

Welcome to the PowerStation Intrusion Challenge! Your task is to infiltrate Bob's computer system and gain unauthorized access. Bob, a dedicated developer at the PowerStation, has been investing long hours into coding essential systems. Unfortunately, Bob struggles with managing his credentials, leaving him vulnerable to security breaches.

One fateful day, Bob's computer suffered a crash, prompting him to seek assistance from his colleague, John, for analyzing the crash files. However, John, similarly plagued by poor credential management practices, inadvertently exposed credentials on the internet while troubleshooting the issue.

Your mission is to exploit the disclosed credentials to breach Bob's computer system. Gain access and retrieve the confidential data stored within. But remember, you're doing this as part of a controlled environment to test your skills and the system's security measures. Good luck!


## How to set up the Vulnerable Machines? 

Step 1 - Decrypt the 7zip file.

There are two VMs which are provided for the CTF. 
Git Gambit and Kermit. Both files need a password to be decrypted.  

Step 2 - Import the ova file using Oracle VirtualBox

Install Oracle Virtual Box. Click file option and select “Import Appliance”
Choose the ova file that you have extracted. 

Step 3 - Change network settings of the VM to Bridged

Once the VM is imported, click VM settings and choose network. Change the attached to option to Bridged Adapter. 

Step 5 - Start the VM

Step 6 - Identifying the Vulnerable Machine

Please run netdiscover on your machine to find the Vulnerable VM.



You will find the name PCS Systemtechnik GmbH in your network. This will be your Vulnerable VM.  The VM is visible to other VMs in the VirtualBox as well as the host machine. 

Note: If you have other VMs running in the network, they will also be shown here. 


## What to do once you solve the machine? 

Once you have finished the challenge, please draft a write up about how you solved the challenge. A sample report will be given along with the guidelines. Please make sure to follow the same format. You will find an option to upload the writeup in the challenge page. 





## Building 

The VM image is given out in s3. 

[VMLink](https://pentathon.s3.ap-south-1.amazonaws.com/Git-Gambit.7z)

File hash ( SHA256) -  AA92883C17A126ABCFA0E8F9D4BD9CF5F2265AF33C8E9664D3BFD699DB90E5B6
## Exploit
[Writeup](Git-Gambit_Write-up.pdf)

