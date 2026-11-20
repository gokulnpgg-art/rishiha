<%@ Page Title="" Language="C#" MasterPageFile="~/authMaster.master" AutoEventWireup="true" CodeFile="AddFund.aspx.cs" Inherits="AddFund" %>

<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table>
    <tr>
        <td colspan="2" style="height: 20px" align="center">
            <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Large" Text="Add Fund Details"></asp:Label>
        </td>
    </tr>
    <tr>
        <td style="width: 178px; height: 26px;">
            <b>Fund ID</b></td>
        <td style="width: 100px; height: 26px;">
            <asp:TextBox ID="TextBox1" runat="server" Width="148px"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px" class="style7">
            <b>Area Name</b></td>
        <td style="width: 100px">
            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px" class="style7">
            <b>Total Amount</b></td>
        <td style="width: 100px">
            <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px" class="style7">
            <b>Department Name</b></td>
        <td style="width: 100px">
            <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px" class="style7">
            <b>Time Duration</b></td>
        <td style="width: 100px">
            <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px" class="style7">
            <b>Incharge Name</b></td>
        <td style="width: 100px">
            <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px; height: 20px">
            <b>Contact No</b></td>
        <td style="width: 100px; height: 20px">
            <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td style="width: 178px; height: 20px">
            <b>Scheme</b></td>
        <td style="width: 100px; height: 20px">
            <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="height: 20px">
            <asp:Label ID="Label16" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Fund Details Description" Width="321px"></asp:Label>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="height: 20px">
            <asp:TextBox ID="TextBox9" runat="server" TextMode="MultiLine" Width="454px"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="height: 20px">
        </td>
    </tr>
    <tr>
        <td style="width: 178px; height: 20px" align="right">
            <asp:Button ID="btnSubmit" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Submit" OnClick="btnSubmit_Click"  />
        </td>
        <td style="width: 100px; height: 20px" align="left">
            <asp:Button ID="btnClear" runat="server" Font-Bold="True" Font-Names="Times New Roman"
                    Font-Size="Medium" Text="Clear" OnClick="btnClear_Click" />
        </td>
    </tr>
    </table>
</asp:Content>

