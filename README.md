# EncryptedContent :closed_lock_with_key:
[![Latest release](https://img.shields.io/github/release/kenlog/EncryptedContent.svg)](https://github.com/kenlog/EncryptedContent/releases)
[![GitHub license](https://img.shields.io/github/license/Naereen/StrapDown.js.svg)](https://github.com/kenlog/EncryptedContent/blob/master/LICENSE)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/kenlog/EncryptedContent/graphs/contributors)
[![Open Source Love](https://badges.frapsoft.com/os/v1/open-source.svg?v=103)]()
[![Downloads](https://img.shields.io/github/downloads/kenlog/EncryptedContent/total.svg)](https://github.com/kenlog/EncryptedContent/releases)

- This plugin allows the insertion of text content encrypted in the kanboard database, with the use of random keys.
- To store keys, it is recommended to use a password manager such as [KeePassXC](https://github.com/keepassxreboot/keepassxc) or similar.

### GDPR compliance. Protected from any data breach.  
_EU General Data Protection Regulation_

![screencapture-EncryptedContent](https://user-images.githubusercontent.com/11728231/49815804-e3815780-fd6c-11e8-8a3b-fd70f1f78cab.jpg)

Author
------------
- Valentino Pesce
- [License MIT](https://github.com/kenlog/EncryptedContent/blob/master/LICENSE)

Contributor
------------
- [Craig Crosby](https://github.com/creecros)

Requirements
------------
Kanboard >= v1.0.48 
Kanboard installed at a web server.
You can find the download at [kanboard.org](https://kanboard.org/)

Installation
------------
You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/EncryptedContent`
3. Clone this repository into the folder `plugins/EncryptedContent`

Note: Plugin folder is case-sensitive. 

### :star: If you like it, do not forget to give a star on GitHub!

:construction_worker: Any contribution will be highly appreciated
------------
Clone the repository: 
```console 
git clone https://github.com/kenlog/EncryptedContent.git
```
To-do list
------------
- [ ] Incorporate the upload of encrypted files

:bug: Reporting Issues
------------
Please [create an issue](https://github.com/kenlog/EncryptedContent/issues/new) for any bugs you've found.

Cryptography Details
------------
This plugin was created using the php-encryption library.
[More information](https://github.com/defuse/php-encryption)
