<?php

final class YCBlogPostPageTemplate {

    /**
     * @return stdClass
     */
    public static function model() {
        $spec = (object)[
            'className' => 'CBViewPage',
            'classNameForKind' => 'YCBlogPostPageKind',
            'layout' => (object)['className' => 'YCBlogPostPageLayout'],
        ];

        // text
        $spec->sections[] = (object)[
            'className' => 'CBThemedTextView',
        ];

        return $spec;
    }

    /**
     * @return string
     */
    public static function title() {
        return 'Blog Post';
    }
}
