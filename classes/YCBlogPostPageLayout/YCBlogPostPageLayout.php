<?php

final class YCBlogPostPageLayout {

    /**
     * @param bool? $layoutModel->addBottomPadding
     * @param bool? $layoutModel->hidePageTitleAndDescriptionView
     * @param hex160? $layoutModel->stylesID
     * @param string? $layoutModel->stylesCSS
     * @param bool? $layoutModel->useLightTextColors
     *
     * @param callable $renderContentCallback
     *
     * @return null
     */
    static function render(stdClass $layoutModel, callable $renderContentCallback) {
        $stylesID = CBModel::value($layoutModel, 'stylesID');
        $stylesCSS = CBModel::value($layoutModel, 'stylesCSS');

        $classes[] = 'YCBlogPostPageLayout';
        if (!empty($stylesID)) {
            $classes[] = CBTheme::IDToCSSClass($stylesID);
        }
        $classes = implode(' ', $classes);

        if (empty($stylesCSS)) {
            $styleElement = '';
        } else {
            $styleElement = "<style>{$stylesCSS}</style>";
        }

        CBView::render((object)[
            'className' => 'YCPageHeaderView',
        ]);

        $styles[] = 'flex: 1 1 auto';

        if (!empty($layoutModel->addBottomPadding)) {
            $styles[] = 'padding-bottom: 100px';
        }

        $styles = implode('; ', $styles);

        ?>

        <main class="<?= $classes ?>" style="<?= $styles ?>">
            <?= $styleElement ?>
            <article>

                <?php

                if (empty($layoutModel->hidePageTitleAndDescriptionView)) {
                    CBView::render(
                        (object)[
                            'className' => 'CBPageTitleAndDescriptionView',
                            'showPublicationDate' => true,
                            'useLightTextColors' => !empty($layoutModel->useLightTextColors),
                        ]
                    );
                }

                $renderContentCallback();

                ?>

            </article>
        </main>

        <?php

        CBView::render((object)[
            'className' => 'YCPageFooterView',
            'hideFlexboxFill' => true,
        ]);
    }

    /**
     * @param model $spec
     *
     * @return ?model
     */
    static function CBModel_build(stdClass $spec): ?stdClass {
        $model = (object)[
            'addBottomPadding' => CBModel::value($spec, 'addBottomPadding', false, 'boolval'),
            'hidePageTitleAndDescriptionView' => CBModel::value($spec, 'hidePageTitleAndDescriptionView', false, 'boolval'),
            'useLightTextColors' => CBModel::value($spec, 'useLightTextColors', false, 'boolval'),
        ];

        if (!empty($stylesTemplate = CBModel::value($spec, 'stylesTemplate', '', 'trim'))) {
            $model->stylesID = CBHex160::random();
            $model->stylesCSS = CBTheme::stylesTemplateToStylesCSS($stylesTemplate, $model->stylesID);
        }

        return $model;
    }
}
