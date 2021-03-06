<?php if ($field->title) { ?><label for="<?php echo $field->id; ?>"><?php echo $field->title; ?></label><?php } ?>
<?php

    if($field->data['is_multiple']){

        echo html_select_multiple($field->element_name, $field->data['items'], $value, $field->data['dom_attr'], $field->data['is_tree']);

    } else {

        if (!$field->native_tag) {
            $this->addJSFromContext('templates/default/js/jquery-chosen.js');
            $this->addCSSFromContext('templates/default/css/jquery-chosen.css');
        }

        echo html_select($field->element_name, $field->data['items'], $value, $field->data['dom_attr']);

    }

?>
<script type="text/javascript">
    <?php if ($field->data['parent']) { ?>
        $('#<?php echo str_replace(':', '_', $field->data['parent']['list']); ?>').on('change', function(){
            icms.forms.updateChildList('<?php echo $field->id; ?>', '<?php echo $field->data['parent']['url']; ?>', $(this).val());
        });
    <?php } ?>
    <?php if (!$field->data['is_multiple'] && !$field->native_tag) { ?>
        $('#<?php echo $field->data['dom_attr']['id']; ?>').chosen({no_results_text: '<?php echo LANG_LIST_EMPTY; ?>', placeholder_text_single: '<?php echo LANG_SELECT; ?>', disable_search_threshold: 8, width: '100%', search_placeholder: '<?php echo LANG_BEGIN_TYPING; ?>'});
    <?php } ?>
</script>