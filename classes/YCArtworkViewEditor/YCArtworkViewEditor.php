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
        return [Colby::flexnameForJavaScriptForClass(CBSiteURL, __CLASS__)];
    }
}
