# Kermit

userflag - `pentathon{cdc2ec2673abd58db14c8a70e231d007f6c2ae347b27b7c8e4eeb93e1ed61fdb}`   
rootflag - ` pentathon{d73fa5793667919bee5b22b55631fb2e99cf0689cf15adb6d93845b106294007}`

## Description

The government has recently launched a new Digital Forensics and Incident Response (DFIR) website, packed with essential tools for investigations. However, rumors suggest that it harbors security vulnerabilities waiting to be exploited.

Your mission, should you choose to accept it, is to breach the website's defenses and gain root access to the server. Can you navigate through the security flaws and uncover the secrets hidden within? 

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

[Sample Report](report.docx)


## Building 

The VM image is given out in S3 

[VMLink](https://pentathon.s3.ap-south-1.amazonaws.com/Kermit.7z)

File hash ( SHA256) -  F8E1549C87877E660AC366A77194AD18B5E25BDED3EDF7986985362FA9B96E6A

## Exploit

[Writeup](Kermit_writup.pdf)

