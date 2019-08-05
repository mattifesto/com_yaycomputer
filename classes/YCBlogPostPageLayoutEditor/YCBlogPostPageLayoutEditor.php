<?php

final class YCBlogPostPageLayoutEditor {

    /**
     * @return [string]
     */
    static function CBHTMLOutput_JavaScriptURLs() {
        return [
            Colby::flexpath(__CLASS__, 'v69.js', cbsiteurl()),
        ];
    }


    /**
     * @return [string]
     */
    static function CBHTMLOutput_requiredClassNames() {
        return [
            'CBUI',
            'CBUIBooleanEditor',
            'CBUIStringEditor',
        ];
    }
}
