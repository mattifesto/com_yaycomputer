<?php

final class YCBlogPostPageLayout {

    /**
     * @param bool? $layoutModel->hidePageTitleAndDescriptionView
     * @param hex160? $layoutModel->stylesID
     * @param string? $layoutModel->stylesCSS
     *
     * @param callable $renderContentCallback
     *
     * @return null
     */
    public static function render(stdClass $layoutModel, callable $renderContentCallback) {
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

        YCPageHeaderView::renderModelAsHTML((object)[]);

        ?>

        <main class="<?= $classes ?>" style="flex: 1 1 auto;">
            <?= $styleElement ?>
            <article>

                <?php

                if (empty($layoutModel->hidePageTitleAndDescriptionView)) {
                    CBPageTitleAndDescriptionView::renderModelAsHTML((object)[
                        'showPublicationDate' => true,
                    ]);
                }

                $renderContentCallback();

                ?>

            </article>
        </main>

        <?php

        YCPageFooterView::renderModelAsHTML((object)[
            'hideFlexboxFill' => true,
        ]);
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    public static function specToModel(stdClass $spec) {
        $model = (object)[
            'className' => __CLASS__,
            'hidePageTitleAndDescriptionView' => CBModel::value($spec, 'hidePageTitleAndDescriptionView', false, 'boolval'),
        ];

        if (!empty($stylesTemplate = CBModel::value($spec, 'stylesTemplate', '', 'trim'))) {
            $model->stylesID = CBHex160::random();
            $model->stylesCSS = CBTheme::stylesTemplateToStylesCSS($stylesTemplate, $model->stylesID);
        }

        return $model;
    }
}
