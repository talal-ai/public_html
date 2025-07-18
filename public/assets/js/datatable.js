/*
-------------------------------------------------------------------------
* Template Name    : DashHub - Tailwind CSS Admin & Dashboard Template  * 
* Author           : Webonzer                                           *
* Version          : 1.0.0                                              *
* Created          : June 2023                                          *
* File Description : Main Js file of the template                       *
*------------------------------------------------------------------------
*/

let data = [
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },

    {
        name: "Dev Master",
        code: 23239,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
    
    {
        name: "Dev Master Adil",
        code: 23238,
        phone: 2938479238,
        email: "dev4@1st4connect.com",
        createdon: "02/10/2021 13:56:08",
        role: "Master",
        status: "Active",
    },
];
window.dataTable = function () {
    return {
        items: [],
        view: 5,
        searchInput: "",
        pages: [],
        offset: 5,
        pagination: {
            total: data.length,
            lastPage: Math.ceil(data.length / 3),
            perPage: 3,
            currentPage: 1,
            from: 1,
            to: 1 * 5,
        },
        currentPage: 1,
        sorted: {
            field: "name",
            rule: "asc",
        },
        initData() {
            this.items = data.sort(this.compareOnKey("name", "asc"));
            this.showPages();
        },
        compareOnKey(key, rule) {
            return function (a, b) {
                if (key === "name" || key === "code" || key === "phone") {
                    let comparison = 0;
                    const fieldA = a[key].toUpperCase();
                    const fieldB = b[key].toUpperCase();
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
                } else {
                    if (rule === "asc") {
                        return a.year - b.year;
                    } else {
                        return b.year - a.year;
                    }
                }
            };
        },
        checkView(index) {
            return index > this.pagination.to || index < this.pagination.from
                ? false
                : true;
        },
        checkPage(item) {
            if (item <= this.currentPage + 3) {
                return true;
            }
            return false;
        },
        search(value) {
            if (value.length > 1) {
                const options = {
                    shouldSort: true,
                    keys: ["name", "code"],
                    threshold: 0,
                };
                const fuse = new Fuse(data, options);
                this.items = fuse.search(value).map((elem) => elem.item);
            } else {
                this.items = data;
            }
            // console.log(this.items.length)

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
                if (page === lastPage) {
                    to = total;
                }
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
            if (from < 1) {
                from = 1;
            }
            let to = from + this.offset - 1;
            if (to > this.pagination.lastPage) {
                to = this.pagination.lastPage;
            }
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
    };
};
