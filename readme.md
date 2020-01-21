# Machigatta PHPInclude

First try after following:
https://docs.typo3.org/m/typo3/book-extbasefluid/master/en-us/4-FirstExtension/1-the-example-extension.html


# REQUIRES:

```ts
config.no_cache = 1
```

```ts

lib.contentElement {
    templateRootPaths.666 = EXT:tx_ma_phpinclude/Resources/Private/Templates/
    partialRootPaths.666 = EXT:tx_ma_phpinclude/Resources/Private/Partials/
    layoutRootPaths.666 = EXT:tx_ma_phpinclude/Resources/Private/Layout/
}
tt_content {
  tx_ma_phpinclude = FLUIDTEMPLATE
  tx_ma_phpinclude {
    file = EXT:tx_ma_phpinclude/Resources/Private/Templates/Show.html
    variables {
      settings < page.10.settings
    }
    
    dataProcessing {
      10 = Machigatta\MaPHPInclude\Controller\DataProcessor\ScriptProcessor
    }
  }
}


```