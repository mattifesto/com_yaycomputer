<?php

final class YCBlogPostPageTemplate {

    /**
     * @return stdClass
     */
    public static function model() {
        $spec = CBStandardPageTemplate::model();
        $spec->classNameForKind = 'YCBlogPostPageKind';
        
        $spec->layout->customLayoutClassName = 'YCBlogPostPageLayout';
        $spec->layout->isArticle = true;

        $spec->sections[0]->showPublicationDate = true;

        return $spec;
    }

    /**
     * @return string
     */
    public static function title() {
        return 'YC Blog Post';
    }
}
