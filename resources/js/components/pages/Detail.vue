<template>
  <div>
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowDetailCards"
        :cards="detailCards"
        :resource="resource"
        :resource-id="resourceId"
        :resource-name="resourceName"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalDetailPage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";
export default {
  mixins: [HasCards],
  components: {
    OriginalDetailPage: Nova.pages["Original.Nova.Detail"],
  },
  extends: Nova.pages["Original.Nova.Detail"],
  inheritAttrs: false,
  
  computed: {
    cardsEndpoint() {
      return `/nova-vendor/resource-cards/${this.resourceName}/cards`;
    },

    extraCardParams() {
      return {
        resourceName: this.resourceName,
        resourceId: this.resourceId,
        display: "detail",
      };
    },
  },
};
</script>