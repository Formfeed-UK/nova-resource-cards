<template>
  <div>
    <LoadingView :loading="loading">
      <ResourceCards
        v-if="shouldShowCreationCards"
        :cards="creationCards"
        :resource="resource"
        :resource-name="resourceName"
        class="mb-6 resource-cards"
      />
    </LoadingView>
    <OriginalCreatePage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";
export default {
  mixins: [HasCards],
  components: {
    OriginalCreatePage: Nova.pages["Original.Nova.Create"],
  },
  extends: Nova.pages["Original.Nova.Create"],
  inheritAttrs: false,

  computed: {
    cardsEndpoint() {
      return `/nova-api/${this.resourceName}/cards`;
    },
    extraCardParams() {
      return {
        resourceName: this.resourceName,
        viaResource: this.viaResource,
        viaResourceId: this.viaResourceId,
        viaRelationship: this.viaRelationship,
        display: "create",
      };
    },
  },
};
</script>