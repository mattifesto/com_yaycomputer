"use strict";
/* jshint strict: global */
/* jshint esversion: 6 */
/* exported YCStandardPageLayoutEditor */
/* global
    CBUI,
    CBUIBooleanEditor,
*/

var YCStandardPageLayoutEditor = {

    /**
     * @param object args.spec
     * @param function args.specChangedCallback
     *
     * @return Element
     */
    createEditor: function (args) {
        var element = CBUI.createElement("YCStandardPageLayoutEditor");

        let section = CBUI.createSection();
        let item = CBUI.createSectionItem();

        item.appendChild(
            CBUIBooleanEditor.create(
                {
                    labelText: "Hide Page Title and Description View",
                    propertyName: "hidePageTitleAndDescriptionView",
                    spec: args.spec,
                    specChangedCallback: args.specChangedCallback,
                }
            ).element
        );

        section.appendChild(item);
        element.appendChild(section);

        return element;
    },
};
