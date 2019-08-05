<?php

final class YCStandardPageLayoutEditor {

    /**
     * @return [string]
     */
    static function CBHTMLOutput_requiredClassNames(): array {
        return [
            'CBUI',
            'CBUIBooleanEditor',
        ];
    }

    /**
     * @return [string]
     */
     static function CBHTMLOutput_JavaScriptURLs(): array {
        return [
            Colby::flexpath(__CLASS__, 'v69.js', cbsiteurl()),
        ];
    }
}
