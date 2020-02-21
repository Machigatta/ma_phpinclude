# MaPHPInclude for TYPO3
> Machigatta PHPInclude
> 
Use this extension with caution. 
Allowing Users to add Content Elements which are including Scripts might open up security issues. 
## Installing:
- Install Extension
- Add the Static `PHPIncludePluginToTemplate` to your Template.

## Usage:
#### Page:
- Create new element on Page
- Special elements
- MaPHPInclude

#### Coice 1 (Standard-Mode):
- Page-Content
- Plugin
- Filename
- Upload / Search for file under /fileadmin
- It gets uploaded to `/uploads/tx_maphpinclude/`
##### Example: 
```
Filename: test.php
Result: /var/www/html/uploads/tx_maphpinclude/test.php
```

#### Choice 2 (Override-Mode):
- Page-Content
- Plugin
- Override-Mode
- Select `Override-Mode`
- Enter Filename
- It uses the `override.basePath` from the extension config as the 
 
##### Example: 
```
basePath: /var/www/html/protectedDirectory/
Filename: testDirectory/test.php
Result: /var/www/html/protectedDirectory/testDirectory/test.php
```