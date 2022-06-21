var C=Object.defineProperty;var h=Object.getOwnPropertySymbols;var k=Object.prototype.hasOwnProperty,w=Object.prototype.propertyIsEnumerable;var u=(e,s,a)=>s in e?C(e,s,{enumerable:!0,configurable:!0,writable:!0,value:a}):e[s]=a,p=(e,s)=>{for(var a in s||(s={}))k.call(s,a)&&u(e,a,s[a]);if(h)for(var a of h(s))w.call(s,a)&&u(e,a,s[a]);return e};import{_ as r,e as b,o,c as i,a as t,t as n,b as d,n as x,d as L,F as v,r as N,f as T,m as B,g as $,h as g,i as f}from"./index.4763e479.js";const H={props:["article"],mounted(){document.title=`${b.hotelName} - ${this.article.title}`}},M={class:"card"},V={class:"card-header p-3"},S={class:"card-header-title-container"},z={class:"textbox"},F=t("p",{class:"timestamp"},[t("img",{src:L}),d(),t("span",null,"23/09/2020 - 09:09")],-1),A={class:"author"},D=d(" by "),E={href:"#"},G={style:{"font-weight":"500"}},I=["innerHTML"];function U(e,s,a,l,_,m){return o(),i("div",M,[t("div",{class:"card-image discussion-image image-pixelated card-image-top",style:x([{backgroundImage:"url("+this.article.image+")"},{"background-color":"rgb(134, 53, 24)",color:"rgb(255, 255, 255)","background-position":"center"}])},[t("div",null,[t("h5",null,n(this.article.title),1),d(" "+n(this.article.description),1)])],4),t("div",V,[t("div",S,[t("div",z,[F,t("p",A,[D,t("a",E,[t("b",G,n(this.article.user.username),1)])])])])]),t("div",{class:"card-content",innerHTML:this.article.content},null,8,I)])}var W=r(H,[["render",U]]);const j={props:["comments"],data(){return{imaging:b.imaging}}},q={class:"col mb-4"},J={class:"card"},K={class:"card-header"},O={class:"card-header-title-container",style:{position:"relative"}},P={class:"card-header-title"},Q={class:"card-content no-spacing oddeven"},R={class:"author"},X={class:"avatar"},Y=["src"],Z={class:"info"},tt={class:"username"},et=["href"],st=["innerHTML"],at={class:"col mb-4"},ot={class:"card"},ct=T('<div class="card-header"><div class="card-header-title-container" style="position:relative;"><div class="card-header-title"> Who&#39;s new? </div></div></div><div class="card-content no-spacing"><textarea name="content" placeholder="Comment here..."></textarea></div>',2),nt={class:"card-footer"},it={type:"submit",class:"btn btn-fw btn-primary"};function rt(e,s,a,l,_,m){return o(),i(v,null,[t("div",q,[t("div",J,[t("div",K,[t("div",O,[t("div",P,n(e.$t("article.comments.title")),1)])]),(o(!0),i(v,null,N(this.comments,c=>(o(),i("div",Q,[t("div",R,[t("div",X,[t("img",{alt:"User avatar",class:"avatar avatar-m",src:`${this.imaging}?figure=${c.user.look}&head_direction=3&direction=2&crr=3&gesture=sml&size=m&headonly=0`},null,8,Y)]),t("div",Z,[t("span",tt,[t("a",{href:`/user/${c.user.username}`},n(c.user.username),9,et)]),t("span",{innerHTML:c.content},null,8,st)])])]))),256))])]),t("div",at,[t("div",ot,[ct,t("div",nt,[t("button",it,n(e.$t("article.comments.react")),1)])])])],64)}var dt=r(j,[["render",rt]]);const lt={data(){return{comment:{id:this.$route.params.id,page:1,offset:8}}},components:{Content:W,Comments:dt},computed:p({},B({authenticated:"auth/authenticated",article:"articles/article",comments:"articles/comments"})),mounted(){this.$store.dispatch("articles/getArticle",this.$route.params.slug),this.$store.dispatch("articles/getComments",this.comment)}},_t={class:"articleComponent"},mt={class:"row"},ht={class:"col-md-8"},ut={class:"row"},pt={class:"col-md-12"},vt={class:"col-md-4"};function $t(e,s,a,l,_,m){const c=$("Content",!0),y=$("Comments");return o(),i("div",_t,[t("div",mt,[t("div",ht,[t("div",ut,[t("div",pt,[e.article?(o(),g(c,{key:0,article:e.article},null,8,["article"])):f("",!0)])])]),t("div",vt,[e.comments?(o(),g(y,{key:0,comments:e.comments},null,8,["comments"])):f("",!0)])])])}var bt=r(lt,[["render",$t]]);export{bt as default};