<?php

final class YCBlogPostPageTemplate {

    /**
     * @return object
     */
    static function CBModelTemplate_spec() {
        $spec = (object)[
            'className' => 'CBViewPage',
            'classNameForKind' => 'YCBlogPostPageKind',
            'layout' => (object)[
                'className' => 'CBPageLayout',
                'CSSClassNames' => 'endContentWithWhiteSpace',
                'customLayoutClassName' => 'YCBlogPostPageLayout',
                'isArticle' => true,
            ],
        ];

        $spec->sections[] = (object)[
            'className' => 'CBPageTitleAndDescriptionView',
            'showPublicationDate' => true,
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
    static function CBModelTemplate_title() {
        return 'Blog Post';
    }
}
