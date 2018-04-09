<?php

final class YCPageTemplate {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBModelTemplates::installTemplate(__CLASS__);
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBModelTemplates'];
    }

    /**
     * @return object
     */
    static function CBModelTemplate_spec(): stdClass {
        $spec = (object)[
            'className' => 'CBViewPage',
            'frameClassName' => 'YCPageFrame',
        ];

        $spec->sections[] = (object)[
            'className' => 'CBPageTitleAndDescriptionView',
        ];

        $spec->sections[] = (object)[
            'className' => 'CBArtworkView',
        ];

        $spec->sections[] = (object)[
            'className' => 'CBMessageView',
        ];

        return $spec;
    }

    /**
     * @return string
     */
    static function CBModelTemplate_title(): string {
        return 'Page';
    }
}
