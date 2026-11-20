using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Data.SqlClient;
using System.Web.Configuration;
public partial class authority : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        try
        {
            con.Open();
            cmd.Connection = con;
            cmd.CommandText = "select distinct(areacode) from locations";
            dr = cmd.ExecuteReader();
            if (dr.Read())
            {
                DropDownList1.Items.Add(dr[0].ToString());

            }
            dr.Close();
        }
        catch (Exception ex)
        { }
        con.Close();
        con.Open();
        cmd.Connection = con;

    }
    protected void btnChkAvailable_Click(object sender, EventArgs e)
    {

    }
    SqlConnection con = new SqlConnection("server=.;integrated security=true;database=grievance");
    SqlCommand cmd = new SqlCommand();
    SqlDataReader dr;
    int x;
    protected void btnReg_Click(object sender, EventArgs e)
    {

        con.Close();
        con.Open();
        cmd.CommandText = "select max(aNo) from authority";
        dr = cmd.ExecuteReader();
        if (dr.Read())
        {
            try
            {
                x = dr.GetInt32(1);
            }
            catch (Exception ex)
            {
                x = 1;
            }
            x = x + 1;
        }
        dr.Close();
        cmd.CommandText = "INSERT INTO authority VALUES (" + x + ",'" + txtFname.Text +
              "','" + txtlastname.Text  +
              "','" + txtEmail.Text +
              "','" + txtphone.Text + "','" + txtLoginName.Text + "','" + txtPass.Text + "','" + ddldepartment.Text + "','" + drpauthorities.Text + "','"+drpadmins.Text +"','"+DropDownList1.Text +"','"+DateTime.Now.ToString()+"')";
        cmd.ExecuteNonQuery();
        Response.Write("<script language='javascript'>alert('Authority successfully Registered')</script>");
    }
    protected void btnReset_Click(object sender, EventArgs e)
    {

    }
    protected void ddlcountry_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
}
