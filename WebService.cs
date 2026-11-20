using System;
using System.Collections;
using System.Web;
using System.Web.Services;
using System.Web.Services.Protocols;

using System.Data.SqlClient;
using System.Data;

/// <summary>
/// Summary description for WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
//[System.Web.Script.Services.ScriptService]


// To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
// [System.Web.Script.Services.ScriptService]
public class WebService : System.Web.Services.WebService 
{

    public WebService ()
    {

        //Uncomment the following line if using designed components 
        //InitializeComponent(); 
    }

    //[WebMethod]
    //public string HelloWorld() {
    //    return "Hello World";
    //}


    [WebMethod]
    public string[] getcompletelist(string str)
    {
        SqlConnection con = new SqlConnection("server=.;database=master;integrated security=true;");
        SqlCommand cmd;
        con.Open();
        cmd = new SqlCommand("select * from query where query like '%" + str + "%'", con);
        SqlDataAdapter da = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        da.Fill(ds);
        string[] value = new string[ds.Tables[0].Rows.Count];

        if (ds.Tables[0].Rows.Count > 0)
        {
            for (int i = 0; i < ds.Tables[0].Rows.Count; i++)
            {
                value.SetValue(ds.Tables[0].Rows[i][1].ToString(), i);
            }
        }
        else
        {

        }
        con.Close();
        return value;

    }
}

