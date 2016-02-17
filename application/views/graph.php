<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>PERT chart item template</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui.css'); ?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery-ui.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/primitives.js'); ?>"></script>
    <link href="<?php echo base_url('assets/primitives.css'); ?>" media="screen" rel="stylesheet" type="text/css" />

    <script type='text/javascript'>
        //<![CDATA[ 
        $(window).load(function () {
            var options = new primitives.famdiagram.Config();
            
            options.cursorItem = 0;
            options.linesWidth = 1;
            options.linesColor = "blue";
            options.lineItemsInterval = 5;
            options.hasSelectorCheckbox = primitives.common.Enabled.False;
            options.orientationType = primitives.common.OrientationType.Center;
            options.pageFitMode = primitives.common.PageFitMode.None;
            options.templates = [getPERTTemplate()];
            options.onItemRender = onTemplateRender;
            options.defaultTemplateName = "pertTemplate";
            options.arrowsDirection = primitives.common.GroupByType.Children;

            options.highlightLinesColor = primitives.common.Colors.blue;
            options.highlightLinesWidth = 1;
            options.highlightLinesType = primitives.common.LineType.Solid;

            function onTemplateRender(event, data) {
                var itemConfig = data.context;

                if (data.templateName == "pertTemplate") {
                    data.element.find("[name=titleBackground]").css({
                        "background": itemConfig.itemTitleColor
                    });

                    var fields = ["title", "label"];
                    for (var index = 0; index < fields.length; index++) {
                        var field = fields[index];

                        var element = data.element.find("[name=" + field + "]");
                        if (element.text() != itemConfig[field]) {
                            element.text(itemConfig[field]);
                        }
                    }
                }
            }

            function getPERTTemplate() {
                var result = new primitives.orgdiagram.TemplateConfig();
                result.name = "pertTemplate";

                result.itemSize = new primitives.common.Size(100, 50);
                result.minimizedItemSize = new primitives.common.Size(100, 50);
                result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);


                var itemTemplate = jQuery(
                      '<div class="bp-item bp-corner-all bt-item-frame">' 
                        + '<div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 96px; height: 20px;">' 
                            + '<div name="title" class="bp-item bp-title" style="text-align: center; top: 3px; left: 6px; width: 88px; height: 20px;">'
                            + '</div>'
                        + '</div>'
                        + '<div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="background: #eeeeee; top: 23px; left: 2px; width: 96px; height: 20px;">' 
                            + '<div name="label" class="bp-item bp-title" style="font-size: 9px; color: black; text-align: center; top: 3px; left: 6px; width: 88px; height: 20px;">'
                            + '</div>'
                        + '</div>'
                    + '</div>'
                ).css({
                    width: result.itemSize.width + "px",
                    height: result.itemSize.height + "px"
                }).addClass("bp-item bp-corner-all bt-item-frame");
                result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

                return result;
            }
            
            
            $.getJSON('http://localhost/ProgramCoordinatorModule/index.php/pages/CoursesJSON', function(data) {
                options.items = data;
                jQuery("#diagram").famDiagram(options);
            });
        }); //]]>
    </script>
</head>

<body style="overflow-y: hidden">
    <div id="diagram" style="width: 100%; height: 680px; border-width: 1px;" />
</body>

</html>