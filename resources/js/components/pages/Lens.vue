<template>
  <div :class="{ '-mt-6': !shouldShowLensCards && cards.length > 0 }">
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowLensCards"
        :cards="lensCards"
        :resource="resource"
        :resource-name="resourceName"
        :lens="lens"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalLensPage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";
export default {
  mixins: [HasCards],
  components: {
    OriginalLensPage: Nova.pages["Original.Nova.Lens"],
  },
  extends: Nova.pages["Original.Nova.Lens"],
  inheritAttrs: false,
  
  computed: {
    cardsEndpoint() {
      return `/nova-vendor/resource-cards/${this.resourceName}/cards`;
    },

    extraCardParams() {
      return {
        resourceName: this.resourceName,
        lens: this.lens,
        display: "lens",
      };
    },
  },
};
</script>