using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;
using System.Net;
using System.Net.Mail;

public partial class AddFund : System.Web.UI.Page
{
    int count;
    SqlConnection con = new SqlConnection("server=.;integrated security=true;database=grievance");
    SqlCommand cmd = new SqlCommand();
    SqlDataReader dr;
    int x;
    protected void Page_Load(object sender, EventArgs e)
    {

        fid();
    }
    protected void btnSubmit_Click(object sender, EventArgs e)
    {
        con.Close();
        con.Open();
        SqlCommand cmd = new SqlCommand("insert into welfare values('" + TextBox1.Text + "','" + TextBox2.Text + "','" + TextBox3.Text + "','" + TextBox4.Text + "','" + TextBox5.Text + "','" + TextBox6.Text + "','" + TextBox7.Text + "','" + TextBox8.Text + "','" + TextBox9.Text + "')", con);
        cmd.ExecuteNonQuery();
        Response.Write("<script>alert('Fund Details Added Successfully')</script>");
        con.Close();
    }
    protected void btnClear_Click(object sender, EventArgs e)
    {
        TextBox1.Text = "";
        TextBox2.Text = "";
        TextBox3.Text = "";
        TextBox4.Text = "";
        TextBox5.Text = "";
        TextBox6.Text = "";
        TextBox7.Text = "";
        TextBox8.Text = "";
        TextBox9.Text = "";
    }
    private void fid()
    {

        con.Close();
        con.Open();
        SqlCommand cmd = new SqlCommand("select count (*) from welfare", con);
        cmd.ExecuteNonQuery();
        count = Convert.ToInt16(cmd.ExecuteScalar()) + 1;
        TextBox1.Text = count.ToString();
        con.Close();
    }

}