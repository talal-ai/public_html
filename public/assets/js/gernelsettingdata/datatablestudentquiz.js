document.addEventListener("alpine:init", () => {
    Alpine.data("dataTable", () => ({
      items: [], // Data will be assigned here
      view: 25,
      searchInput: "",
      pages: [],
      offset: 25,
      pagination: {
        total: 0,
        lastPage: 1,
        perPage: 3,
        currentPage: 1,
        from: 1,
        to: 1 * 25,
      },
      currentPage: 1,
      sorted: {
        field: "quizsubmitbystudnet", // Default sorting field
        rule: "asc", // Default sorting rule
      },
      init() {
        // Initialize with data from the global variable
        this.items = window.mergedData || [];
        console.log(this.items); // Debug to ensure data is set correctly
  
        this.pagination.total = this.items.length;
        this.pagination.lastPage = Math.ceil(
          this.items.length / this.pagination.perPage
        );
        this.initData();
      },
      initData() {
        this.items = this.items.sort(
          this.compareOnKey(this.sorted.field, this.sorted.rule)
        );
        this.showPages();
      },
      compareOnKey(key, rule) {
        return function (a, b) {
          const fieldA = (a[key] || "").toString().toUpperCase();
          const fieldB = (b[key] || "").toString().toUpperCase();
          let comparison = 0;
  
          if (rule === "asc") {
            if (fieldA > fieldB) {
              comparison = 1;
            } else if (fieldA < fieldB) {
              comparison = -1;
            }
          } else {
            if (fieldA < fieldB) {
              comparison = 1;
            } else if (fieldA > fieldB) {
              comparison = -1;
            }
          }
          return comparison;
        };
      },
      checkView(index) {
        return index > this.pagination.to || index < this.pagination.from
          ? false
          : true;
      },
      checkPage(item) {
        return item <= this.currentPage + 3;
      },
      search(value) {
        if (value.length > 1) {
          // Use Fuse.js for searching
          const options = {
            shouldSort: true,
            keys: ["name"],
            threshold: 0,
          };
          const fuse = new Fuse(this.items, options);
          this.items = fuse.search(value).map((elem) => elem.item);
        } else {
          this.items = window.mergedData || [];
        }
        this.changePage(1);
        this.showPages();
      },
      sort(field, rule) {
        this.items = this.items.sort(this.compareOnKey(field, rule));
        this.sorted.field = field;
        this.sorted.rule = rule;
      },
      changePage(page) {
        if (page >= 1 && page <= this.pagination.lastPage) {
          this.currentPage = page;
          const total = this.items.length;
          const lastPage = Math.ceil(total / this.view) || 1;
          const from = (page - 1) * this.view + 1;
          let to = page * this.view;
          if (page === lastPage) to = total;
          this.pagination.total = total;
          this.pagination.lastPage = lastPage;
          this.pagination.perPage = this.view;
          this.pagination.currentPage = page;
          this.pagination.from = from;
          this.pagination.to = to;
          this.showPages();
        }
      },
      showPages() {
        const pages = [];
        let from = this.pagination.currentPage - Math.ceil(this.offset / 2);
        if (from < 1) from = 1;
        let to = from + this.offset - 1;
        if (to > this.pagination.lastPage) to = this.pagination.lastPage;
        while (from <= to) {
          pages.push(from);
          from++;
        }
        this.pages = pages;
      },
      changeView() {
        this.changePage(1);
        this.showPages();
      },
      isEmpty() {
        return this.pagination.total ? false : true;
      },
    }));
  });
  