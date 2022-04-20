import axios from "axios";

export default {
    data() {
        return {};
    },
    methods: {
        async callApi(method, url, dataObj) {
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObj,
                });
            } catch (error) {
                return error.response;
            }
        },
        info(desc, title = "Hej") {
            this.$Notice.info({
                title: title,
                desc: desc,
            });
        },
        success(desc, title = "Super") {
            this.$Notice.success({
                title: title,
                desc: desc,
            });
        },
        warning(desc, title = "Ooops") {
            this.$Notice.warning({
                title: title,
                desc: desc,
            });
        },
        error(desc, title = "Krivo :(") {
            this.$Notice.error({
                title: title,
                desc: desc,
            });
        },
        swr(desc = "Nešto je pošlo krivo, pokušaj ponovno...", title = "Oops") {
            this.$Notice.error({
                title: title,
                desc: desc,
            });
        },
    },
};
