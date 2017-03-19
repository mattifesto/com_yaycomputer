<?php

final class YCArtworkViewEditor {

    /**
     * @return [string]
     */
    static function requiredClassNames() {
        return ['CBUI', 'CBUIImageChooser'];
    }

    /**
     * @return [string]
     */
    static function requiredJavaScriptURls() {
        return [Colby::flexnameForJavaScriptForClass(CBSitePreferences::siteURL(), __CLASS__)];
    }
}
