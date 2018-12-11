# EncryptedContent :closed_lock_with_key:
**In development** :construction_worker:
- This plugin allows the insertion of text content encrypted in the kanboard database, with the use of random keys.
- To store keys, it is recommended to use a password manager such as [KeePassX](https://github.com/keepassx/keepassx) or similar.

![screencapture-EncryptedContent](https://user-images.githubusercontent.com/11728231/49745723-e6fadd00-fc9f-11e8-972a-5d55cefc4f3a.jpg)

Author
------------
- Valentino Pesce
- License MIT

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
:bug: Reporting Issues
------------
Please [create an issue](https://github.com/kenlog/EncryptedContent/issues/new) for any bugs you've found.

Cryptography Details
------------
This plugin was created using the php-encryption library.
[More information](https://github.com/defuse/php-encryption)
