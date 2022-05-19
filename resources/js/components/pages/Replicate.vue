<template>
  <div>
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowReplicateCards"
        :cards="replicateCards"
        :resource="resource"
        :resource-id="resourceId"
        :resource-name="resourceName"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalReplicatePage v-bind="$props" />
  </div>
</template>

<script>

import HasCards from "#/mixins/HasCards";
export default {
  name: "Replicate",
  mixins: [HasCards],
  components: {
    OriginalReplicatePage: Nova.pages["Original.Nova.Replicate"],
  },
  extends: Nova.pages["Original.Nova.Replicate"],
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
        display: "replicate",
      };
    },
  },
};
</script>
