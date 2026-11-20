using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Xml.Linq;

public partial class AdminMaster : System.Web.UI.MasterPage
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void l3_Click(object sender, EventArgs e)
    {
        Response.Redirect("Login.aspx");
    }
    protected void l2_Click(object sender, EventArgs e)
    {
        Session["user"] = "admin";
        Response.Redirect("uinterestfactor.aspx");
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("authority.aspx");
    }
}
