<?php

final class YCAppleProductsView {

    /**
     * @param model $spec
     *
     * @return ?model
     */
    static function CBModel_build(stdClass $spec): ?stdClass {
        return (object)[
            'productModels' => CBModel::valueToArray($spec, 'productModels'),
        ];
    }

    /**
     * @param model $model
     *
     * @return void
     */
    static function CBView_render(stdClass $model): void {
        echo '<div class="YCAppleProductsView">';

        $productModels = CBModel::valueToArray($model, 'productModels');

        array_walk($productModels, function ($model) {
            $title = CBModel::valueToString($model, 'title');
            $content = CBModel::valueToString($model, 'content');
            if ($amazonCode = CBModel::valueToString($model, 'amazonCode')) {
                $amazonURL = "https://amazon.com/dp/{$amazonCode}/?tag=yaycomputer05-20";
                $amazonLink = "(View at Amazon > (a {$amazonURL}))";
            } else {
                $amazonLink = '';
            }

            $URL = CBModel::valueToString($model, 'productURL');

            $markup = <<<EOT

                --- h1
                {$title}
                ---

                {$content}

                --- center
                (View at Apple > (a {$URL}))

                {$amazonLink}
                ---

EOT;

            CBView::renderSpec((object)[
                'className' => 'CBMessageView',
                'markup' => $markup,
            ]);
        });

        echo '</div>';
    }
}
