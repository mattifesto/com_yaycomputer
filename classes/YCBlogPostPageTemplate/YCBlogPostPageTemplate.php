<?php

final class
YCBlogPostPageTemplate {

    /* -- CBInstall interfaces -- -- -- -- -- */



    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBModelTemplateCatalog::install(__CLASS__);
    }



    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBModelTemplateCatalog'
        ];
    }



    /* -- CBModelTemplate interfaces -- -- -- -- -- */



    /**
     * @return object
     */
    static function
    CBModelTemplate_spec(
    ): stdClass {
        $pageSpec = CBViewPage::standardPageTemplate();

        CBModel::merge(
            $pageSpec,
            (object)[
                'classNameForKind' => 'YCBlogPostPageKind',
                'selectedMainMenuItemName' => 'blog',
                'sections' => CBDefaults_BlogPost::viewSpecs(),
            ]
        );

        return $pageSpec;
    }
    /* CBModelTemplate_spec() */



    /**
     * @return string
     */
    static function CBModelTemplate_title(): string {
        return 'Blog Post';
    }

}
