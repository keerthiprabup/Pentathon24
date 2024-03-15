# Kermit

userflag - `pentathon{cdc2ec2673abd58db14c8a70e231d007f6c2ae347b27b7c8e4eeb93e1ed61fdb}`   
rootflag - ` pentathon{d73fa5793667919bee5b22b55631fb2e99cf0689cf15adb6d93845b106294007}`

## Description



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

The VM image is given out in a onedrive. 

[VMLink](https://amritauniv-my.sharepoint.com/personal/varunnair_am_amrita_edu/_layouts/15/onedrive.aspx?id=%2Fpersonal%2Fvarunnair%5Fam%5Famrita%5Fedu%2FDocuments%2FKermit&ga=1)

## Exploit

[Writeup](Kermit_writup.pdf)

