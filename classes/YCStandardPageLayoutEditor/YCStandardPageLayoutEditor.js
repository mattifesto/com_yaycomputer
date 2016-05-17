"use strict"; /* jshint strict: global */
/* global CBUI, CBUIBooleanEditor */

var YCStandardPageLayoutEditor = {

    /**
     * @param object args.spec
     * @param function args.specChangedCallback
     *
     * @return Element
     */
    createEditor : function(args) {
        var section, item;
        var element = document.createElement("div");
        element.className = "YCStandardPageLayoutEditor";
        section = CBUI.createSection();
        item = CBUI.createSectionItem();

        item.appendChild(CBUIBooleanEditor.create({
            labelText : "Hide Page Title and Description View",
            propertyName : "hidePageTitleAndDescriptionView",
            spec : args.spec,
            specChangedCallback : args.specChangedCallback,
        }).element);
        section.appendChild(item);
        element.appendChild(section);

        return element;
    },
};
