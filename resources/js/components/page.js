import axios from 'axios';

export default () => ({
    page: null,
    ajax: false,
    showPage: true,
    ajaxLoading: false,
    panelId: 'renderedpanel',
    async initAction() {
        let link = window.landingUrl;
        let route = window.landingRoute;
        let el = document.getElementById(this.panelId);
        while (el == null) {
            await window.sleep(50);
            el = document.getElementById(this.panelId);
        }
        if (this.$store.app.xpages == undefined) {
            this.$store.app.xpages = [];
        }
        if (this.$store.app.xpages[link] == undefined) {
            this.$store.app.xpages[link] = {};
        }
        setTimeout(() => {
            this.$store.app.xpages[link].html = el.innerHTML;
        }, 500);
        // history.pushState({href: link}, '', link);
        history.pushState({href: link, route: route, target: this.panelId, fragment: 'main-panel'}, '', link);
    },
    historyAction(e) {
        if (e.state != undefined && e.state != null) {
            let link = e.state.href;
            let route = e.state.route;
            let target = e.state.target;
            let fragment = e.state.fragment;
            this.showPage = false;
            this.ajaxLoading = true;
            if (this.$store.app.xpages == undefined) {
                this.$store.app.xpages = [];
            }
            if (this.$store.app.xpages[link] == undefined) {
                this.$store.app.xpages[link] = {};
            }
            if (this.$store.app.xpages[link] != undefined) {
                setTimeout(() => {
                    this.showPage = true;
                    // this.page = this.$store.app.xpages[link];
                    this.$dispatch('pagechanged', {currentpath: link, currentroute: route, target: target, fragment: fragment});
                    this.$dispatch('contentupdate', {content: this.$store.app.xpages[link].html, target: target});
                    if (this.$store.app.xpages[link].x_metatags != undefined) {
                        this.$dispatch('metachange', {data: this.$store.app.xpages[link].x_metatags});
                    }
                    this.ajaxLoading = false;
                },
                    100
                );
            } else {
                setTimeout(() => {
                        this.showPage = true;
                        this.ajaxLoading = false;
                    },
                    100
                );
            }
        }
    },
    getQueryString(params) {
        let thelink = "";
            let keys = Object.keys(params);

            for (let j=0; j < keys.length; j++) {
                if (Array.isArray(params[keys[j]])) {
                    for (let x = 0; x < params[keys[j]].length; x++) {
                        thelink += keys[j]+'[]=' + params[keys[j]][x];
                        if (x < (params[keys[j]].length -1)) {
                            thelink += '&';
                        }
                    }
                } else {
                    thelink += keys[j]+'=' + params[keys[j]];
                }

                if (j < (keys.length - 1)) {
                    thelink += '&';
                }
            }
            return thelink;
    },
    fetchLink(detail) {
        let targetPanelId;
        let theRoute = detail.route;
        let fr = (typeof detail.fragment != 'undefined' && detail.fragment != null) ? detail.fragment : 'main-panel';
        let forceFresh = typeof detail.fresh != 'undefined' && detail.fresh === true;
        if (typeof detail.target == 'undefined' || detail.target == null) {
            targetPanelId = this.panelId;
        } else {
            targetPanelId = detail.target;
        }
        let link = detail.link;
        let params = detail.params;
        // console.log(params);
        // let data = detail.data;
        let thelink = link;
        if (detail.params != null) {
            thelink += "?" + this.getQueryString(params);
        }
        if (!forceFresh && this.$store.app.xpages != undefined && this.$store.app.xpages[thelink] != undefined) {
            this.showPage = false;
            this.ajaxLoading = true;
            if (this.$store.app.xpages[thelink] != undefined) {
                setTimeout(() => {
                    this.showPage = true;
                    this.$dispatch('contentupdate', {content: this.$store.app.xpages[thelink].html, target: targetPanelId});

                    if (this.$store.app.xpages[thelink].x_metatags != undefined) {
                        console.log('meta change');
                        this.$dispatch('xmetachange', {data: this.$store.app.xpages[thelink].x_metatags});
                    }
                    if (this.$store.app.xpages[thelink].x_title != undefined) {

                        this.$dispatch('xtitlechange', {data: this.$store.app.xpages[thelink].x_title});
                    }
                    this.$dispatch('pagechanged', {currentpath: link, currentroute: detail.route});
                    this.ajaxLoading = false;
                },
                    100
                );
            } else {
                setTimeout(() => {
                    this.showPage = true;
                    this.ajaxLoading = false;
                },
                    100
                );
            }
            history.pushState({href: thelink, route: theRoute, target: targetPanelId, fragment: fr}, '', thelink);
        } else {
            this.$store.app.pageloading = true;
            // if (params != null) {
            //     params['x_mode'] = 'ajax';
            //     params['x_fr'] = fr;
            // } else {
            //     params = {x_mode: 'ajax'};
            //     params = {x_fr: fr};
            // }
            this.ajaxLoading = true;
            //console.log('requesting fragment '+fr);
            axios.get(
                link,
                {
                    params: params,
                    headers: {
                        'X-Fr': fr,

                    }
                }
              ).then(
                (r) => {
                    //console.log(r.data);
                    this.showPage = false;
                    this.ajax = true;
                    setTimeout(
                        () => {
                            // document.getElementById(targetPanelId).innerHTML = r.data;
                            this.$dispatch('contentupdate', {content: r.data.html, target: targetPanelId});
                            // this.$dispatch('pagechanged', {currentpath: link, currentroute: detail.route});
                            // this.page = r.data;

                            if (r.data.x_metatags != undefined) {
                                console.log('meta change');
                                this.$dispatch('xmetachange', {data: r.data.x_metatags});
                            }
                            if (r.data.x_title != undefined) {

                                this.$dispatch('xtitlechange', {data: r.data.x_title});
                            }
                            this.showPage = true;
                            this.ajaxLoading = false;
                        },
                        100
                    );
                    if (this.$store.app.xpages == undefined || this.$store.app.xpages == null) {
                        this.$store.app.xpages = [];
                    }
                    if (targetPanelId == this.panelId) {

                        this.$store.app.xpages[thelink] = r.data;


                        // history.pushState({href: thelink, route: theRoute}, '', thelink);
                        history.pushState({href: thelink, route: theRoute, target: targetPanelId, fragment: fr}, '', thelink);
                        this.$dispatch('pagechanged', {currentpath: link, currentroute: detail.route});
                    }
                    this.$store.app.pageloading = false;
                }
            ).catch(
                function (e) {
                    console.log(e);
                }
            );
        }
    },

    fetchAction(detail){
        let targetPanelId;
        if (typeof detail.target == 'undefined' || detail.target == null) {
            targetPanelId = this.panelId;
        } else {
            targetPanelId = detail.target;
        }
        let fr = (typeof detail.fragment != 'undefined' && detail.fragment != null) ? detail.fragment : 'main-panel';
        let link = detail.link;
        let params = detail.params;


        this.ajaxLoading = true;
            axios.get(
                link,
                {
                    params: params,
                    headers: {
                        'X-Fr': fr,

                    }
                }
              ).then(
                (r) => {


                    //console.log(r.data);
                    if(r.data.success != undefined && r.data.success===false){

                        this.$dispatch('actionresponse', {target: detail.target, content: r.data});
                        this.ajaxLoading = false;
                    }
                    else if(r.data.success != undefined && r.data.success===true){

                        this.$dispatch('actionresponse', {target: detail.target, content: r.data});
                        this.ajaxLoading = false;
                    }
                    else{


                    this.showPage = false;
                    this.ajax = true;

                    setTimeout(
                        () => {

                            // document.getElementById(targetPanelId).innerHTML = r.data;
                            this.$dispatch('contentupdate', {content: r.data.html, target: targetPanelId});
                            // this.$dispatch('pagechanged', {currentpath: link, currentroute: detail.route});
                            // this.page = r.data;
                            this.showPage = true;
                            this.ajaxLoading = false;
                        },
                        100
                    );

                    }
                    // if (this.$store.app.xpages == undefined || this.$store.app.xpages == null) {
                    //     this.$store.app.xpages = [];
                    // }
                    // if (targetPanelId == this.panelId) {
                    //     this.$store.app.xpages[thelink] = r.data;
                    //     // history.pushState({href: thelink, route: theRoute}, '', thelink);
                    //     history.pushState({href: thelink, route: theRoute, target: targetPanelId, fragment: fr}, '', thelink);
                    //     this.$dispatch('pagechanged', {currentpath: link, currentroute: detail.route});
                    // }
                    // this.$store.app.pageloading = false;
                }
            ).catch(
                function (e) {
                    console.log(e);
                }
            );
    },
    resetPages() {
        this.$store.app.xpages = [];
    },
    postForm(data) {
        console.log(data);
        this.ajaxLoading = true;
        axios.post(data.url, data.formData, {
            headers: {
            'Content-Type': 'multipart/form-data',
            'X-Fr': data.fragment
            }
        }).then((r) => {
            console.log(r);
            this.$dispatch('formresponse', {target: data.target, content: r.data});
            this.ajaxLoading = false;
        }).catch((e)=>{
            console.log(e.response.data);
            this.$dispatch('formresponse', {target: data.target, content: e.response.data});
            this.ajaxLoading = false;
        });
    }
});
