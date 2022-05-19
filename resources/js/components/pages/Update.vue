<template>
  <div>
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowUpdateCards"
        :cards="updateCards"
        :resource="resource"
        :resource-id="resourceId"
        :resource-name="resourceName"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalUpdatePage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";
export default {
  mixins: [HasCards],
  components: {
    OriginalUpdatePage: Nova.pages["Original.Nova.Update"],
  },
  extends: Nova.pages["Original.Nova.Update"],
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
        display: "update",
      };
    },
  },
};
</script>