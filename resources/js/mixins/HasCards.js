import filter from 'lodash/filter'

export default {
  props: {
    loadCards: {
      type: Boolean,
      default: true,
    },
  },

  data: () => ({ 
    cards: [],
    loading: true
  }),

  /**
   * Fetch all of the metrics panels for this view
   */
  created() {
    this.fetchCards()
  },

  watch: {
    cardsEndpoint() {
      this.fetchCards()
    },
  },

  methods: {
    async fetchCards() {
      // We disable fetching of cards when the component is being show
      // on a resource detail view to avoid extra network requests
      if (this.loadCards) {
        const { data: cards } = await Nova.request().get(this.cardsEndpoint, {
          params: this.extraCardParams,
        })
        this.cards = cards
        this.loading = false;
      }
    },
  },

  computed: {
    /**
     * Determine whether we have cards to show on the Dashboard.
     */
    shouldShowCards() {
      return this.cards.length > 0;
    },

    shouldShowDetailCards() {
      return this.detailCards.length > 0;
    },

    shouldShowIndexCards() {
      return this.indexCards.length > 0;
    },

    shouldShowCreationCards() {
      return this.creationCards.length > 0;
    },

    shouldShowUpdateCards() {
      return this.updateCards.length > 0;
    },

    shouldShowAttachCards() {
      return this.attachCards.length > 0;
    },

    shouldShowReplicateCards() {
      return this.replicateCards.length > 0;
    },

    shouldShowLensCards() {
      return this.lensCards.length > 0;
    },

    indexCards() {
      return filter(this.cards, c => c.showOnIndex != false && c.resourceCard == true);
    },

    detailCards() {
      return filter(this.cards, c => c.showOnDetail != false  && c.resourceCard == true);
    },

    creationCards() {
      return filter(this.cards, c => c.showOnCreation != false  && c.resourceCard == true);
    },

    updateCards() {
      return filter(this.cards, c => c.showOnUpdate != false  && c.resourceCard == true);
    },

    attachCards() {
      return filter(this.cards, c => c.showOnAttach != false  && c.resourceCard == true);
    },

    replicateCards() {
      return filter(this.cards, c => c.showOnReplicate != false  && c.resourceCard == true);
    },

    lensCards() {
      return filter(this.cards, c => c.showOnLens != false  && c.resourceCard == true);
    },

    /**
     * Get the extra card params to pass to the endpoint.
     */
    extraCardParams() {
      return null
    },
  },
}
