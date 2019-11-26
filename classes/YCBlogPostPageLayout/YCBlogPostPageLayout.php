<?php

final class YCBlogPostPageLayout {

    /**
     * @param object $layoutModel
     * @param callable $renderContentCallback
     *
     * @return void
     */
    static function render(
        stdClass $layoutModel,
        callable $renderContentCallback
    ): void {
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

        CBView::render(
            (object)[
                'className' => 'YCPageHeaderView',
            ]
        );

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
                            'useLightTextColors' => !empty(
                                $layoutModel->useLightTextColors
                            ),
                        ]
                    );
                }

                $renderContentCallback();

                ?>

            </article>
        </main>

        <?php

        CBView::render(
            (object)[
                'className' => 'YCPageFooterView',
                'hideFlexboxFill' => true,
            ]
        );
    }
    /* render() */



    /**
     * @param object $spec
     *
     * @return object
     */
    static function CBModel_build(stdClass $spec): ?stdClass {
        $model = (object)[
            'addBottomPadding' => CBModel::valueToBool(
                $spec,
                'addBottomPadding'
            ),

            'hidePageTitleAndDescriptionView' => CBModel::valueToBool(
                $spec,
                'hidePageTitleAndDescriptionView'
            ),

            'useLightTextColors' => CBModel::valueToBool(
                $spec,
                'useLightTextColors'
            ),
        ];

        $stylesTemplate = trim(
            CBModel::valueToString(
                $spec,
                'stylesTemplate'
            )
        );

        if ($stylesTemplate !== '') {
            $model->stylesID = CBID::generateRandomCBID();
            $model->stylesCSS = CBTheme::stylesTemplateToStylesCSS(
                $stylesTemplate,
                $model->stylesID
            );
        }

        return $model;
    }
    /* CBModel_build() */

}
