<?php

final class YCBlogPostPageLayoutEditor {

    /**
     * @return [string]
     */
    public static function requiredClassNames() {
        return ['CBUI', 'CBUIBooleanEditor'];
    }

    /**
     * @return [string]
     */
    public static function requiredJavaScriptURLs() {
        return [Colby::URLForJavaScriptForSiteClass(__CLASS__)];
    }
}
