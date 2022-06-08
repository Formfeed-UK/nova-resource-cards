<template>
  <div>
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowAttachCards"
        :cards="creationCards"
        :resource-name="resourceName"
        :resource-id="resourceId"
        :related-resource-name="relatedResourceName"
        :via-resource="viaResource"
        :via-resource-id="viaResourceId"
        :parent-resource="parentResource"
        :via-relationship="viaRelationship"
        :polymorphic="polymorphic"
        :form-unique-id="formUniqueId"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalAttachPage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";

export default {
  name: "Attach",

  mixins: [HasCards],
  components: {
    OriginalAttachPage: Nova.pages["Original.Nova.Attach"],
  },
  extends: Nova.pages["Original.Nova.Attach"],
  inheritAttrs: false,

  computed: {
    cardsEndpoint() {
      return `/nova-vendor/resource-cards/${this.resourceName}/cards`;
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
        display: "attach",
      };
    },
  },
};
</script>
