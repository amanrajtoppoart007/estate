<?php
function get_quick_links()
{
    return [
        [
            "module"=>"LEASING",
            "title"=>"Rent Enquiry",
            "bg_color"=>"white",
            "color"=>"purple",
            "icon"=>"fa fa-info",
            "url"=>route("rentEnquiry.list")
        ],
        [
            "module"=>"LEASING",
            "title"=>"Sales Enquiry",
            "bg_color"=>"white",
            "color"=>"navy",
            "icon"=>"fa fa-info",
            "url"=>route("salesEnquiry.list")
        ],
        [
            "module"=>"LEASING",
            "title"=>"Tenants",
            "bg_color"=>"white",
            "color"=>"teal",
            "icon"=>"fa fa-users",
            "url"=>route("tenant.list")
        ],
        [
            "module"=>"PROPERTY",
            "title"=>"Agents",
            "bg_color"=>"white",
            "color"=>"lightblue",
            "icon"=>"fa fa-users",
            "url"=>route("agent.list")
        ],
        [
            "module"=>"LEASING",
            "title"=>"Buyers",
            "bg_color"=>"white",
            "color"=>"maroon",
            "icon"=>"fa fa-users",
            "url"=>route("buyer.list")
        ],
        [
            "module"=>"PROPERTY",
            "title"=>"Developers",
            "bg_color"=>"white",
            "color"=>"lime",
            "icon"=>"fab fa-dev",
            "url"=>route("developer.list")
        ],

        [
            "module"=>"PROPERTY",
            "title"=>"Flat Owners",
            "bg_color"=>"white",
            "color"=>"indigo",
            "icon"=>"fa fa-users",
            "url"=>route("owner.list")
        ],

        [
            "module"=>"PROPERTY",
            "title"=>"Properties",
            "bg_color"=>"white",
            "color"=>"olive",
            "icon"=>"fa fa-building",
            "url"=>route("property.list")
        ],

        [
            "module"=>"LEASING",
            "title"=>"Sales",
            "bg_color"=>"white",
            "color"=>"info",
            "icon"=>"fas fa-shopping-cart",
            "url"=>route("propertySales.list")
        ],



        [
            "module"=>"WORK_ORDER",
            "title"=>"Maintenance",
            "bg_color"=>"white",
            "color"=>"pink",
            "icon"=>"fa fa-wrench",
            "url"=>route("maintenance.list")
        ],

        [
            "module"=>"WORK_ORDER",
            "title"=>"Task",
            "bg_color"=>"white",
            "color"=>"orange",
            "icon"=>"fa fa-tasks",
            "url"=>route("task.list")
        ],

        [
            "module"=>"PAYROLL",
            "title"=>"Department",
            "bg_color"=>"white",
            "color"=>"teal",
            "icon"=>"fa fa-university",
            "url"=>route("department.list")
        ],

        [
            "module"=>"PAYROLL",
            "title"=>"Employee",
            "bg_color"=>"white",
            "color"=>"primary",
            "icon"=>"fa fa-users",
            "url"=>route("employee.list")
        ],

        [
             "module"=>"PAYROLL",
            "title"=>"Attendance",
            "bg_color"=>"white",
            "color"=>"secondary",
            "icon"=>"fa fa-clock",
            "url"=>route("attendance.list")
        ],

        [
             "module"=>"PAYROLL",
            "title"=>"Designation",
            "bg_color"=>"white",
            "color"=>"lime",
            "icon"=>"fas fa-code-branch",
            "url"=>route("designation.list")
        ],

        [
            "module"=>"PAYROLL",
            "title"=>"Salary",
            "bg_color"=>"white",
            "color"=>"teal",
            "icon"=>"fab fa-btc",
            "url"=>route("salary.sheet.list")
        ],

        [
            "module"=>"SETTINGS",
            "title"=>"Settings",
            "bg_color"=>"white",
            "color"=>"navy",
            "icon"=>"fa fa-cogs",
            "url"=>route("settings")
        ],

        [
             "module"=>"NOTIFICATION",
            "title"=>"Contact Queries",
            "bg_color"=>"white",
            "color"=>"orange",
            "icon"=>"fa fa-question-circle",
            "url"=>route("contact-request.list")
        ],

        [
            "module"=>"NOTIFICATION",
            "title"=>"Document Renewal",
            "bg_color"=>"white",
            "color"=>"lime",
            "icon"=>"fa fa-sync",
            "url"=>route("expiry.warning.document.list")
        ],
    ];
}
