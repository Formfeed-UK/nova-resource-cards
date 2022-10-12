<template>
  <div>
    <ResourceCards
      v-if="shouldShowDashboardCards"
      :cards="dashboardCards"
      resource="dashboard"
      :resource-name="name"
      class="mb-6 resource-cards"
    />
    <OriginalDashboardPage v-bind="$props" />
  </div>
</template>

<script>
import HasCards from "#/mixins/HasCards";
export default {
  mixins: [HasCards],
  components: {
    OriginalDashboardPage: Nova.pages["Original.Nova.Dashboard"],
  },
  extends: Nova.pages["Original.Nova.Dashboard"],
  inheritAttrs: false,
  
  computed: {
    cardsEndpoint() {
      return `/nova-vendor/resource-cards/${this.name}/cards`;
    },

    extraCardParams() {
      return {
        resourceName: this.name,
        display: "dashboard",
      };
    },
  },
};
</script>
