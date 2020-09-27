<?php
function get_quick_links()
{
    return [
        [
            "title"=>"Rent Enquiry",
            "bg_color"=>"white",
            "color"=>"purple",
            "icon"=>"fa fa-info",
            "url"=>route("rentEnquiry.list")
        ],
        [
            "title"=>"Sales Enquiry",
            "bg_color"=>"white",
            "color"=>"navy",
            "icon"=>"fa fa-info",
            "url"=>route("salesEnquiry.list")
        ],
        [
            "title"=>"Tenants",
            "bg_color"=>"white",
            "color"=>"teal",
            "icon"=>"fa fa-users",
            "url"=>route("tenant.list")
        ],
        [
            "title"=>"Agents",
            "bg_color"=>"white",
            "color"=>"lightblue",
            "icon"=>"fa fa-users",
            "url"=>route("agent.list")
        ],
        [
            "title"=>"Buyers",
            "bg_color"=>"white",
            "color"=>"maroon",
            "icon"=>"fa fa-users",
            "url"=>route("buyer.list")
        ],
        [
            "title"=>"Developers",
            "bg_color"=>"white",
            "color"=>"lime",
            "icon"=>"fab fa-dev",
            "url"=>route("developer.list")
        ],

        [
            "title"=>"Flat Owners",
            "bg_color"=>"white",
            "color"=>"indigo",
            "icon"=>"fa fa-users",
            "url"=>route("owner.list")
        ],

        [
            "title"=>"Properties",
            "bg_color"=>"white",
            "color"=>"olive",
            "icon"=>"fa fa-building",
            "url"=>route("property.list")
        ],

        [
            "title"=>"Sales",
            "bg_color"=>"white",
            "color"=>"info",
            "icon"=>"fas fa-shopping-cart",
            "url"=>route("propertySales.list")
        ],



        [
            "title"=>"Maintenance",
            "bg_color"=>"white",
            "color"=>"pink",
            "icon"=>"fa fa-wrench",
            "url"=>route("maintenance.list")
        ],

        [
            "title"=>"Task",
            "bg_color"=>"white",
            "color"=>"orange",
            "icon"=>"fa fa-tasks",
            "url"=>route("task.list")
        ],

        [
            "title"=>"Department",
            "bg_color"=>"white",
            "color"=>"teal",
            "icon"=>"fa fa-university",
            "url"=>route("department.list")
        ],

        [
            "title"=>"Employee",
            "bg_color"=>"white",
            "color"=>"primary",
            "icon"=>"fa fa-users",
            "url"=>route("employee.list")
        ],

        [
            "title"=>"Attendance",
            "bg_color"=>"white",
            "color"=>"secondary",
            "icon"=>"fa fa-clock",
            "url"=>route("attendance.list")
        ],

        [
            "title"=>"Designation",
            "bg_color"=>"white",
            "color"=>"lime",
            "icon"=>"fas fa-code-branch",
            "url"=>route("designation.list")
        ],

        [
            "title"=>"Salary",
            "bg_color"=>"white",
            "color"=>"teal",
            "icon"=>"fab fa-btc",
            "url"=>route("salary.sheet.list")
        ],

        [
            "title"=>"Settings",
            "bg_color"=>"white",
            "color"=>"navy",
            "icon"=>"fa fa-cogs",
            "url"=>route("settings")
        ],

        [
            "title"=>"Contact Queries",
            "bg_color"=>"white",
            "color"=>"orange",
            "icon"=>"fa fa-question-circle",
            "url"=>route("contact-request.list")
        ],

        [
            "title"=>"Document Renewal",
            "bg_color"=>"white",
            "color"=>"lime",
            "icon"=>"fa fa-sync",
            "url"=>route("expiry.warning.document.list")
        ],
    ];
}
