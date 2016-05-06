<?php

final class YCStandardPageTemplate {

    /**
     * @return stdClass
     */
    public static function model() {
        $spec = (object)[
            'className' => 'CBViewPage',
            'layout' => (object)['className' => 'YCStandardPageLayout'],
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
        return 'Standard Page';
    }
}
