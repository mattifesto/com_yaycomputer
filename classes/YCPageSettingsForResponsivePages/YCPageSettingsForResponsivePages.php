<?php

final class
YCPageSettingsForResponsivePages {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBPageSettingsCatalog::install(__CLASS__);
    }



    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBPageSettingsCatalog'];
    }



    /**
     * @return [string]
     */
    static function CBPageSettings_htmlElementClassNames(): array {
        return ['CBLightTheme', 'CBStyleSheet'];
    }



    /**
     * @return [string]
     */
    static function
    CBPageSettings_requiredClassNames(
    ): array {
        return [
            'CBEqualizePageSettingsPart',
            'CBResponsiveViewportPageSettingsPart',
            'CBGoogleTagManagerPageSettingsPart',
            'CBFacebookPageSettingsPart',
            'CB_CBPageSettingsPart_SitePreferences',
        ];
    }
    /* CBPageSettings_requiredClassNames() */

}
