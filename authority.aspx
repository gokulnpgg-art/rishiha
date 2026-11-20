<%@ Page Language="C#" MasterPageFile="~/AdminMaster.master" AutoEventWireup="true" CodeFile="authority.aspx.cs" Inherits="authority" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table style="height: 319px; width: 786px">
        <tr>
            <td>
                &nbsp;</td>
            <td  colspan="3">
                <asp:Label ID="lblMsg" runat="server" Font-Bold="True" ForeColor="Red" Visible="False"></asp:Label>
            </td>
        </tr>
        <tr>
            <td align="center" style="height: 30px">
            </td>
            <td align="center" colspan="3" style="height: 30px">
                <asp:Label ID="Label5" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="X-Large" Text="Authority Registration Page" Font-Underline="True" 
                    ForeColor="#FF66CC"></asp:Label>
            </td>
        </tr>
        <tr>
            <td align="center">
                &nbsp;</td>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label13" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Personal Details" ForeColor="#FF0066"></asp:Label>
            </td>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 100px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="First Name"></asp:Label>
            </td>
            <td style="width: 100px">
                <asp:TextBox ID="txtFname" runat="server"></asp:TextBox>
            </td>
            <td style="width: 100px">
                <asp:Label ID="lblAvail" runat="server" Font-Bold="True" ForeColor="Red"></asp:Label>
            </td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label11" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Last Name"></asp:Label>
            </td>
            <td style="width: 100px">
                <asp:TextBox ID="txtlastname" runat="server"></asp:TextBox>
            </td>
            <td style="width: 100px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label8" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="E-mail id"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="txtEmail" runat="server" Width="247px"></asp:TextBox>
            </td>
            <td>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ControlToValidate="txtEmail"
                    ErrorMessage="Invalid E-mail ID" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
            </td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label10" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Phone Number"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="txtphone" runat="server" MaxLength="10"></asp:TextBox>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label14" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Login Details" ForeColor="#FF0066"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label3" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Login ID" Width="132px"></asp:Label>
            </td>
            <td style="width: 100px">
                <asp:TextBox ID="txtLoginName" runat="server"></asp:TextBox>
            </td>
            <td style="width: 100px">
                <asp:Button ID="btnChkAvailable" runat="server" Text="Check availability" 
                    OnClick="btnChkAvailable_Click" />
            </td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label6" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Password" Width="135px"></asp:Label>
            </td>
            <td style="width: 100px">
                <asp:TextBox ID="txtPass" runat="server"  TextMode="Password" Width="244px"></asp:TextBox>
            </td>
            <td style="width: 100px">
            </td>
        </tr>
        <tr>
            <td style="width: 100px">
                &nbsp;</td>
            <td style="width: 124px">
                <asp:Label ID="Label7" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Confirm Password" Width="134px"></asp:Label>
            </td>
            <td style="width: 100px">
                <asp:TextBox ID="txtConfirmPass" runat="server" TextMode="Password" 
                    Width="251px"></asp:TextBox>
            </td>
            <td style="width: 100px">
                <asp:CompareValidator ID="CompareValidator1" runat="server" ControlToCompare="txtPass"
                    ControlToValidate="txtConfirmPass" ErrorMessage="password missmatch" Width="140px"></asp:CompareValidator>
            </td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; height: 21px">
                <asp:Label ID="Label15" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Work Details" ForeColor="#FF0066"></asp:Label>
            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; height: 21px">
                <asp:Label ID="Label17" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Department"></asp:Label>
            </td>
            <td style="width: 100px; height: 21px">
                                                <asp:DropDownList ID="ddldepartment" 
                    runat="server" Height="33px" Width="163px" 
                                                    
                    onselectedindexchanged="ddlcountry_SelectedIndexChanged">
                                                    <asp:ListItem></asp:ListItem>
                                                    <asp:ListItem>Commerce</asp:ListItem>
                                                    <asp:ListItem>Management </asp:ListItem>
                                                    <asp:ListItem>Computer Science</asp:ListItem>
                                                    <asp:ListItem>Information Technology</asp:ListItem>
                                                    <asp:ListItem>Computer Technology</asp:ListItem>
                                                    <asp:ListItem>Computer Applications</asp:ListItem>
                                                    <asp:ListItem>AI and ML</asp:ListItem>
                                                    <asp:ListItem>AI and DS</asp:ListItem>
                                                </asp:DropDownList>
                                            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; " rowspan="2">
                <asp:Label ID="Label16" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Category"></asp:Label>
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                <asp:DropDownList ID="drpadmins" runat="server" Height="16px" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="149px">
                    <asp:ListItem>Teaching Staff</asp:ListItem>
                    <asp:ListItem>Lad Incharge</asp:ListItem>
                    <asp:ListItem>Non-Teaching Staff</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; height: 21px">
                Designation</td>
            <td style="width: 100px; height: 21px">
                <asp:TextBox ID="txtLocation" runat="server" Width="145px"></asp:TextBox>
            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                <asp:DropDownList ID="DropDownList1" runat="server" Height="16px" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="244px" 
                    Visible="False">
                    <asp:ListItem></asp:ListItem>
                </asp:DropDownList>
            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                <asp:DropDownList ID="drpauthorities" runat="server" Height="16px" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="149px" 
                    Visible="False">
                    <asp:ListItem></asp:ListItem>
                    <asp:ListItem>HOD</asp:ListItem>
                    <asp:ListItem>Professor</asp:ListItem>
                    <asp:ListItem>Assistance Professor</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
            <td style="width: 124px; height: 21px">
            </td>
            <td style="width: 100px; height: 21px">
                <asp:Button ID="btnReg" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Submit" OnClick="btnReg_Click" 
                    Width="131px" />
                <asp:Button ID="btnReset" runat="server" Font-Names="Times New Roman"
                    Font-Size="Medium"  OnClick="btnReset_Click"
                    Text="Clear" Width="131px" />
            </td>
            <td style="width: 100px; height: 21px">
            </td>
        </tr>
        <tr>
            <td style="height: 21px">
                &nbsp;</td>
            <td colspan="2" style="height: 21px">
                &nbsp;</td>
            <td colspan="1" style="height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="height: 21px">
                &nbsp;</td>
            <td colspan="2" style="height: 21px">
                &nbsp;</td>
            <td colspan="1" style="height: 21px">
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

