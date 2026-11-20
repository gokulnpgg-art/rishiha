using System;
using System.Data;
using System.Configuration;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Data.SqlClient;

/// <summary>
/// Summary description for DataAccess
/// </summary>
public class DataAccess
{
    public SqlConnection cn;
    public SqlCommand cmd;
    public SqlDataReader dr;
    public SqlDataAdapter da;
    public DataSet ds = new DataSet();
    public DataAccess()
    { }
    public void DBOpen()
    {
        //cn = new SqlConnection(@"Data Source=.;AttachDbFilename=D:\Train\db\IRCTC.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True");
        cn = new SqlConnection(@"Data Source=.;Initial Catalog=grievance;Integrated Security=True");
        cn.Open();
    }
    public void DBClose()
    {
        cn.Close();
    }

    public void DBCmdOpen(string query)
    {
        try
        {
            DBOpen();
            cmd = new SqlCommand(query, cn);
            cmd.ExecuteNonQuery();
        }
       catch (Exception ex)
        { }
    }
    public void DBCmdClose()
    {
        cmd = null;
        cn.Close();
    }
    public SqlDataReader DBReaderOpen(string query)
    {
        DBOpen();
        cmd = new SqlCommand(query, cn);
        dr = cmd.ExecuteReader();
        return dr;
    }
    public void DBReaderClose()
    {
        dr.Close();
        cmd = null;
        DBClose();
    }
    public void dataSetRead(string query, DataSet dss)
    {
        DBOpen();
        cmd = new SqlCommand(query, cn);
        da = new SqlDataAdapter(cmd);
        da.Fill(dss);
        DBClose();
    }

    public void DBDataAdapter(string query, GridView gvControl)
    {
        DBOpen();
        cmd = new SqlCommand(query ,cn);
        da = new SqlDataAdapter(cmd);
        ds = new DataSet();
        da.Fill(ds);
        gvControl.DataSource = ds;
        gvControl.DataBind();
        DBClose();
    }

    public void NewUser(int mode, string fname,string lname,string uname,string pwd, string email,DateTime dob,string gender,string add1,string add2,string city,string state,string country,string pincode,string phone )
    {
         DBOpen();
         cmd = new SqlCommand("userInfo_SP",  cn);
         cmd.CommandType = CommandType.StoredProcedure;

         cmd.Parameters.Add(new SqlParameter("@mode", mode));
         cmd.Parameters.Add(new SqlParameter("@FirstName", fname ));
         cmd.Parameters.Add(new SqlParameter("@LastName", lname));
         cmd.Parameters.Add(new SqlParameter("@UName", uname));
         cmd.Parameters.Add(new SqlParameter("@pwd", pwd));
         cmd.Parameters.Add(new SqlParameter("@Email", email ));
         cmd.Parameters.Add(new SqlParameter("@DOB",dob));
         cmd.Parameters.Add(new SqlParameter("@Gender", gender ));
         cmd.Parameters.Add(new SqlParameter("@address1", add1));
         cmd.Parameters.Add(new SqlParameter("@address2", add2));
         cmd.Parameters.Add(new SqlParameter("@city ", city));
         cmd.Parameters.Add(new SqlParameter("@state", state ));
         cmd.Parameters.Add(new SqlParameter("@country", country ));
         cmd.Parameters.Add(new SqlParameter("@pincode", pincode ));
         cmd.Parameters.Add(new SqlParameter("@phone", phone ));
       
        cmd.ExecuteNonQuery();
        cn.Close();
    }
    public void favourite(int mode, string username, string link)
    {
        DBOpen();
        cmd = new SqlCommand("sp_Favourite", cn);
        cmd.CommandType = CommandType.StoredProcedure;

        cmd.Parameters.Add(new SqlParameter("@mode", mode));
        cmd.Parameters.Add(new SqlParameter("@uname",username));
        cmd.Parameters.Add(new SqlParameter("@link", link ));

        cmd.ExecuteNonQuery();
        cn.Close();
    }
    public void sp_logout(string userName, int id)
    {
        DBOpen();
        cmd = new SqlCommand("SP_logout", cn);
        cmd.CommandType = CommandType.StoredProcedure;

        cmd.Parameters.Add(new SqlParameter("@id", id));
        cmd.Parameters.Add(new SqlParameter("@Uname",userName));

        cmd.ExecuteNonQuery();
        cn.Close();
    }
    //public void sp_data(string uname, DateTime loginTime, DateTime logouttime, DateTime l1intime, DateTime l1outtime, DateTime l2intime, DateTime l2outtime, DateTime l3intime, DateTime l3outtime, DateTime l4intime, DateTime l4outtime, string linkName)
    public void sp_data(string uname, DateTime loginTime,  string linkName)
    {
         DBOpen();
         cmd = new SqlCommand("sp_data", cn);
         cmd.CommandType = CommandType.StoredProcedure;

        cmd.Parameters.Add(new SqlParameter("@uname", uname ));
        cmd.Parameters.Add(new SqlParameter("@loginTime ",loginTime));        
        cmd.Parameters.Add(new SqlParameter("@linkName",linkName ));      
         cmd.ExecuteNonQuery();
         DBClose();
    }
    public void sp_updatedataArt(string  paraName1,int id,string userid )
    {
        SqlDataReader dr1=DBReaderOpen("select artintime from data where id=" + id + " and uname like '" + userid + "'");
        if (dr1.HasRows) 
        {
            dr1.Read ();
            if (dr[0].ToString ()=="")
            {
                string str="Update data set artIntime='"+ DateTime.Now +"',"+paraName1+ "='" +DateTime.Now+"' where id="+id +" and uname like '"+ userid +"'";
                DBCmdOpen(str);
            }
            else
            {               
                DBCmdOpen("Update data set "+paraName1+ "='" +DateTime.Now+"' where id="+id +" and uname like '"+ userid +"'");
            }
        }
                DBCmdOpen("Update tempdata set linkName='ArtIntime'");
    }
    public void sp_updatedataHome(string paraName1, int id, string userid)
    {
        SqlDataReader dr1 = DBReaderOpen("select HomeIntime from data  where id=" + id + " and uname like '" + userid + "'");
        if (dr1.HasRows) 
        {
            dr1.Read ();
            if (dr[0].ToString ()=="")
            {
                string str = "Update data set HomeIntime='" + DateTime.Now + "'," + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'";
                DBCmdOpen(str);
            }
            else
            {               
                DBCmdOpen("Update data set " + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'");
            }
        }
        DBCmdOpen("Update tempdata set linkName='HomeInTime'");
    }
    public void sp_updatedataStudy(string paraName1, int id, string userid)
    {
        SqlDataReader dr1 = DBReaderOpen("select studyIntime from data where id=" + id + " and uname like '" + userid + "'");
        if (dr1.HasRows)
        {
            dr1.Read();
            if (dr[0].ToString() == "")
            {
                string str = "Update data set studyIntime='" + DateTime.Now + "'," + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'";
                DBCmdOpen(str);
            }
            else
            {
                DBCmdOpen("Update data set "+ paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'");
            }
        }
       
        DBCmdOpen("Update tempdata set linkName='studyIntime'");
    }
    public void sp_updatedataHistoric(string paraName1, int id, string userid)
    {
        SqlDataReader dr1 = DBReaderOpen("select HistoricIntime from data where id=" + id + " and uname like '" + userid + "'");
        if (dr1.HasRows)
        {
            dr1.Read();
            if (dr[0].ToString() == "")
            {
                string str = "Update data set HistoricIntime='" + DateTime.Now + "'," + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'";
                DBCmdOpen(str);
            }
            else
            {
                DBCmdOpen("Update data set " + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'");
            }
        }
       
        DBCmdOpen("Update tempdata set linkName='HistoricInTime'");
    }
    public void sp_updatedataResearch(string paraName1, int id, string userid)
    {
        SqlDataReader dr1 = DBReaderOpen("select ResearchIntime from data where id=" + id + " and uname like '" + userid + "'");
        if (dr1.HasRows)
        {
            dr1.Read();
            if (dr[0].ToString() == "")
            {
                string str = "Update data set ResearchIntime='" + DateTime.Now + "'," + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'";
                DBCmdOpen(str);
            }
            else
            {
                DBCmdOpen("Update data set "+ paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'");
            }
        }
       
        DBCmdOpen("Update tempdata set linkName='ResearchInTime'");
    }
    public void sp_updatedataLogout(string paraName1, int id, string userid)
    {
        DBCmdOpen("Update data set " + paraName1 + "='" + DateTime.Now + "' where id=" + id + " and uname like '" + userid + "'");
        
    }
    
    

}
