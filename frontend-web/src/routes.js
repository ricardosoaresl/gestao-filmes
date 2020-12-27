/*!

=========================================================
* Light Bootstrap Dashboard React - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard-react
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard-react/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
import Dashboard from "views/Dashboard.jsx";
import Discover from "views/Discover.jsx";
import Movie from "views/Movie.jsx";

const dashboardRoutes = [
  {
    path: "/dashboard",
    name: "Home",
    icon: "pe-7s-graph",
    component: Dashboard,
    layout: "/admin",
    visible: true
  },
  {
    path: "/discover",
    name: "Dicover",
    icon: "pe-7s-graph",
    component: Discover,
    layout: "/admin",
    visible: true
  },
  {
    path: "/movie",
    name: "Movie",
    icon: "pe-7s-graph",
    component: Movie,
    layout: "/admin",
    visible: false
  },
];

export default dashboardRoutes;
