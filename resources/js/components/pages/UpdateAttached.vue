<template>
  <div>
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowAttachCards"
        :cards="attachCards"
        :resource-name="resourceName"
        :resource-id="resourceId"
        :related-resource-name="relatedResourceName"
        :related-resource-id="relatedResourceId"
        :via-resource="viaResource"
        :via-resource-id="viaResourceId"
        :parent-resource="parentResource"
        :via-relationship="viaRelationship"
        :via-pivot-id="viaPivotId"
        :polymorphic="polymorphic"
        :form-unique-id="formUniqueId"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalUpdateAttachedPage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";

export default {
  name: "UpdateAttached",

  mixins: [HasCards],
  components: {
    OriginalUpdateAttachedPage: Nova.pages["Original.Nova.UpdateAttached"],
  },
  extends: Nova.pages["Original.Nova.UpdateAttached"],
  inheritAttrs: false,

  computed: {
    cardsEndpoint() {
      return `/nova-api/${this.resourceName}/cards`;
    },

    extraCardParams() {
      return {
        resourceName: this.resourceName,
        resourceId: this.resourceId,
        viaResource: this.viaResource,
        viaResourceId: this.viaResourceId,
        viaRelationship: this.viaRelationship,
        parentResource: this.parentResource,
        polymorphic: this.polymorphic,
        formUniqueId: this.formUniqueId,
        relatedResourceName: this.relatedResourceName,
        relatedResourceId: this.relatedResourceId,
        viaPivotId: this.viaPivotId,
        display: "updateAttached",
      };
    },
  },
};
</script>
