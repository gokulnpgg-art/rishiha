<%@ Page Language="C#" MasterPageFile="~/masterindex.master" AutoEventWireup="true" CodeFile="account.aspx.cs" Inherits="Default2" Title="Untitled Page" %>
<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table style="height: 319px; width: 786px">
        <tr>
            <td style="width: 64px">
                &nbsp;</td>
            <td  colspan="4">
                <asp:Label ID="lblMsg" runat="server" Font-Bold="True" ForeColor="Red" Visible="False"></asp:Label></td>
        </tr>
        <tr>
            <td align="center" style="width: 64px">
                &nbsp;</td>
            <td align="center" colspan="4">
                <asp:Label ID="Label5" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="X-Large" Text="Registration Page" Font-Underline="True" 
                    ForeColor="#FF66CC"></asp:Label></td>
        </tr>
        <tr>
            <td style="width: 64px">
                &nbsp;</td>
            <td style="width: 100px">
                <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Name"></asp:Label></td>
            <td style="width: 100px" colspan="2">
                <asp:TextBox ID="txtFname" runat="server"></asp:TextBox></td>
            <td style="width: 100px">
                <asp:Label ID="lblAvail" runat="server" Font-Bold="True" ForeColor="Red"></asp:Label>
            </td>
        </tr>
        <tr>
            <td style="width: 64px">
                &nbsp;</td>
            <td style="width: 100px">
                <asp:Label ID="Label8" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="E-mail id"></asp:Label>
            </td>
            <td colspan="2">
                <asp:TextBox ID="txtEmail" runat="server" Width="247px"></asp:TextBox>
            </td>
            <td>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ControlToValidate="txtEmail"
                    ErrorMessage="Invalid E-mail ID" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
            </td>
        </tr>
        <tr>
            <td style="width: 64px">
                &nbsp;</td>
            <td style="width: 100px">
                <asp:Label ID="Label10" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Phone"></asp:Label>
            </td>
            <td colspan="2">
                <asp:TextBox ID="txtEmail0" runat="server" Width="247px" MaxLength="10"></asp:TextBox>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td style="width: 64px">
                </td>
            <td style="width: 100px">
                <asp:Label ID="Label3" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Login ID" Width="132px"></asp:Label></td>
            <td style="width: 100px">
                <asp:TextBox ID="txtLoginName" runat="server" Width="196px"></asp:TextBox>
                <br />
                <br />
            </td>
            <td style="width: 100px">
                <asp:Button ID="btnChkAvailable" runat="server" Text="Check availability" 
                    OnClick="btnChkAvailable_Click" Width="221px" Visible="False" /></td>
            <td style="width: 100px">
                </td>
        </tr>
        <tr>
            <td style="width: 64px; height: 41px;">
                </td>
            <td style="width: 100px; height: 41px;">
                <asp:Label ID="Label6" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Password" Width="135px"></asp:Label></td>
            <td style="width: 100px; height: 41px;" colspan="2">
                <asp:TextBox ID="txtPass" runat="server"  TextMode="Password" Width="244px"></asp:TextBox></td>
            <td style="width: 100px; height: 41px;">
            </td>
        </tr>
        <tr>
            <td style="width: 64px; height: 50px;">
                </td>
            <td style="width: 100px; height: 50px;">
                <asp:Label ID="Label7" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Confirm Password" Width="134px"></asp:Label></td>
            <td style="width: 100px; height: 50px;" colspan="2">
                <asp:TextBox ID="txtConfirmPass" runat="server" TextMode="Password" 
                    Width="251px"></asp:TextBox></td>
            <td style="width: 100px; height: 50px;">
                <asp:CompareValidator ID="CompareValidator1" runat="server" ControlToCompare="txtPass"
                    ControlToValidate="txtConfirmPass" ErrorMessage="password missmatch" Width="140px"></asp:CompareValidator></td>
        </tr>
        <tr>
            <td style="width: 64px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                <asp:Label ID="Label9" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Area Name"></asp:Label></td>
            <td style="width: 100px; height: 21px" colspan="2">
                <asp:TextBox ID="txtLocation" runat="server" Width="249px"></asp:TextBox>
            </td>
            <td style="width: 100px; height: 21px">
                <asp:DropDownList ID="DropDownList1" runat="server" Height="16px" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="109px" 
                    Visible="False">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td style="width: 64px; height: 41px">
                </td>
            <td style="width: 100px; height: 41px">
                <asp:Label ID="Label11" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Gender"></asp:Label></td>
            <td style="width: 100px; height: 41px" colspan="2">
                <asp:DropDownList ID="DropDownList2" runat="server" Height="29px" Width="106px">
                    <asp:ListItem>Male</asp:ListItem>
                    <asp:ListItem>Female</asp:ListItem>
                    <asp:ListItem>Trans-Gender</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td style="width: 100px; height: 41px">
                </td>
        </tr>
        <tr>
            <td style="width: 64px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                <asp:Label ID="Label12" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Address"></asp:Label></td>
            <td style="width: 100px; height: 21px" colspan="2">
                <asp:TextBox ID="TextBox1" runat="server" Height="94px" TextMode="MultiLine" 
                    Width="261px"></asp:TextBox>
            </td>
            <td style="width: 100px; height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 64px; height: 21px">
                &nbsp;</td>
            <td style="width: 100px; height: 21px">
                <asp:Button ID="btnReg" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Register" OnClick="btnReg_Click" 
                    Width="131px" />
            </td>
            <td style="width: 100px; height: 21px" colspan="2">
                <asp:Button ID="btnReset" runat="server" Font-Names="Times New Roman"
                    Font-Size="Medium"  OnClick="btnReset_Click"
                    Text="Clear" Width="131px" />
            </td>
            <td style="width: 100px; height: 21px">
            </td>
        </tr>
        <tr>
            <td style="height: 21px; width: 64px;">
                &nbsp;</td>
            <td colspan="3" style="height: 21px">
                &nbsp;</td>
            <td colspan="1" style="height: 21px">
                &nbsp;</td>
        </tr>
        <tr>
            <td style="height: 21px; width: 64px;">
                &nbsp;</td>
            <td colspan="3" style="height: 21px">
                &nbsp;</td>
            <td colspan="1" style="height: 21px">
                &nbsp;</td>
        </tr>
    </table>
    &nbsp; 
</asp:Content>

