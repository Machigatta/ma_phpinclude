mod.wizards.newContentElement.wizardItems.common {
    elements {
        MaPHPIncludeSCRIPT {
          iconIdentifier = ma-php-include-icon
          title = LLL:EXT:MaPHPInclude/Resources/Private/Language/Tca.xlf:tx_ma_phpinclude_content_model.wizard.title
          description = LLL:EXT:MaPHPInclude/Resources/Private/Language/Tca.xlf:tx_ma_phpinclude_content_model.wizard.description
          tt_content_defValues {
             CType = MaPHPIncludeSCRIPT
          }
       }
    }
    show := addToList(MaPHPIncludeSCRIPT)
 }