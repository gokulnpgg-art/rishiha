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

public partial class authMaster : System.Web.UI.MasterPage
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
        //Session["user"] = "Admin";
        Response.Redirect("viewdet.aspx");
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("grievanceview.aspx");
    }
    protected void FE_Click(object sender, EventArgs e)
    {
        Response.Redirect("funddet.aspx");
    }
    protected void LinkButton1_Click1(object sender, EventArgs e)
    {
        Response.Redirect("postreplay.aspx?id=1");
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("postthread.aspx");
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        Response.Redirect("AddFund.aspx");
    }
}
